<?php

    namespace App\Http\Controllers\Api;

    use App\Http\Controllers\Controller;
    use App\Http\Resources\PostResource;
    use App\Models\Post;
    use Exception;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;

    class TogglePublishStatusController extends Controller
    {
        /**
         * Handle the incoming request.
         *
         * @param  Post  $post
         * @param  Request  $request
         * @return JsonResponse
         */
        public function __invoke(Post $post, Request $request)
        {
            try {
                DB::beginTransaction();

                $post->update(['published_at' => $post->is_published ? null : now()]);

                DB::commit();

                return response()->json([
                    'message' => __('Post '.($post->is_published ? 'published' : 'unpublished').' successfully.'),
                    'post'    => new PostResource($post->fresh()),
                ]);
            } catch (Exception $exception) {
                DB::rollBack();

                return response()->json([
                    'error' => $exception->getMessage(),
                ]);
            }
        }
    }
