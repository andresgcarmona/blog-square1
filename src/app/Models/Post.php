<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Post extends Model
    {
        use HasFactory;
        use SoftDeletes;

        protected $table = 'posts';

        protected $guarded = [];

        protected $dates = [
            'published_at',
            'deleted_at',
        ];

        /**
         * Returns the user who created the post.
         *
         * @return BelongsTo
         */
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        /**
         * Alias of user()
         *
         * @return BelongsTo
         */
        public function author(): BelongsTo
        {
            return $this->user();
        }

        /**
         * Scope for published posts.
         *
         * @param $query
         * @return mixed
         */
        public function scopePublished($query)
        {
            return $query->whereNotNull('published_at');
        }

        /**
         * Returns true if the post is published.
         *
         * @return bool
         */
        public function isPublishedAttribute(): bool
        {
            return $this->attributes['published_at'] !== null;
        }
    }
