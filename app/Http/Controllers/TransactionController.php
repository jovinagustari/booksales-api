<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function index() {
        $transactions = Transaction::with(['user', 'book'])->get();

        // Check if the transactions collection is empty
        if ($transactions->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No transactions found',
                'data' => []
            ], 404);
        }

        // Return the transactions with user and book relationships
        return response()->json([
        'success' => true,
        'message' => 'Transactions retrieved successfully',
        'data' => $transactions
       ], 200);
    }

    public function store(Request $request) {
        // 1. Validator & check validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        // 2. Generate orderNumber -> unique | ORD0003
        $uniqueCode = "ORD" . strtoupper(uniqid());

        // 3. Ambil user yang login dan cek apakah user tersebut ada
        $user = auth('api')->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated',
                'data' => null
            ], 401);
        }

        // 4. Mencari data buku dari request
        $book = Book::find($request->book_id);

        // 5. Cek stok buku yang tersedia
        if ($book->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient stock for the requested book',
                'data' => null
            ], 400);
        }

        // 6. Hitung total harga = price * quantity
        $totalAmount = $book->price * $request->quantity;

        // 7. Kurangi/update stok buku
        $book->stock -= $request->quantity;
        $book->save();

        // 8. Simpan data transaksi
        $transaction = Transaction::create([
            'order_number' => $uniqueCode,
            'customer_id' => $user->id,
            'book_id' => $request->book_id,
            'total_amount' => $totalAmount
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully',
            'data' => $transaction
        ], 201);
    }

    public function show(string $id) {
        $transaction = Transaction::with(['user', 'book'])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Successfully retrieved transaction by ID',
            'data' => $transaction
        ], 200);
    }

    public function update(Request $request, string $id) {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
                'data' => null
            ], 404);
        }

        // Validator dan cek validator
        $validator = Validator::make($request->all(), [
            'book_id' => 'sometimes|required|exists:books,id',
            'quantity' => 'sometimes|required|integer|min:1'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $bookId = $request->book_id ?? $transaction->book_id;
        $quantity = $request->quantity ?? 1;

        // Cek apakah buku yang diminta ada
        $book = Book::find($bookId);

        // Kembalikan stok sebelumnya
        $oldBook = Book::find($transaction->book_id);
        if ($oldBook) {
            $oldBook->stock += 1; // default rollback 1 quantity
            $oldBook->save();
        }

        // Cek stock baru
        if ($book->stock < $quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Insufficient stock for the requested book',
                'data' => null
            ], 400);
        }

        // Update stock buku
        $book->stock -= $quantity;
        $book->save();

        // Hitung totalAmount baru jika ada perubahan
        $totalAmount = $book->price * $quantity;

        // Update transaksi
        $transaction->update([
            'book_id' => $book->id,
            'total_amount' => $totalAmount,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully',
            'data' => $transaction
        ], 200);
    }

    public function destroy(string $id) {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaction not found',
                'data' => null
            ], 404);
        }

        // Kembalikan stok buku
        $book = Book::find($transaction->book_id);
        if ($book) {
            $book->stock += 1; // default rollback 1 quantity
            $book->save();
        }

        // Hapus transaksi
        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully',
            'data' => null
        ], 200);
    }
}
