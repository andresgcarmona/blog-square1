<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\PostRequest;
    use App\Models\Post;
    use Exception;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Validation\ValidationException;

    class CreatePostController extends Controller
    {
        /**
         * Handle the incoming request.
         *
         * @param  PostRequest  $request
         * @return RedirectResponse
         * @throws ValidationException
         */
        public function __invoke(PostRequest $request)
        {
            try {
                DB::beginTransaction();

                $post = Post::create($request->validated());

                DB::commit();

                return redirect()->route('post.show', $post)
                                 ->with('message', __('Post created successfully.'));
            } catch (Exception $exception) {
                DB::rollBack();

                return redirect()->back()
                                 ->withErrors(['error' => __('Something went wrong, please try again.')]);
            }
        }
    }
