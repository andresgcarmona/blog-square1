<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\PostRequest;
    use App\Models\Post;
    use Exception;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\DB;

    class UpdatePostController extends Controller
    {
        /**
         * Handle the incoming request.
         *
         * @param  Post  $post
         * @param  PostRequest  $request
         * @return RedirectResponse
         */
        public function __invoke(Post $post, PostRequest $request)
        {
            try {
                DB::beginTransaction();

                $post = tap($post)->update($request->validated());

                DB::commit();

                return redirect()->route('post.show', $post)
                                 ->with('message', __('Post updated successfully.'));
            } catch (Exception $exception) {
                DB::rollBack();

                return redirect()->back()
                                 ->withErrors(['error' => __('Something went wrong, please try again.').(config('app.debug') ? ' '.$exception->getMessage() : '')]);
            }
        }
    }
