<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CashTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'payment_category_id',
        'amount',
        'date_paid',
        'transaction_note',
        'proof_file',
        'created_by',
    ];

    /**
     * Get the student relationship.
     */
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the student relationship.
     */
    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * Scope a query to search for data across multiple columns.
     */
    public function scopeSearch(Builder $query, string $searchQuery): void
    {
        $query->where('amount', 'like', "%{$searchQuery}%")
            ->orWhereHas('student', function (Builder $studentQuery) use ($searchQuery) {
                $studentQuery->where('name', 'like', "%{$searchQuery}%");
            })
            ->orWhereHas('createdBy', function (Builder $userQuery) use ($searchQuery) {
                $userQuery->where('name', 'like', "%{$searchQuery}%");
            });
    }
}
