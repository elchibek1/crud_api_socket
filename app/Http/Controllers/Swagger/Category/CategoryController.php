<?php

namespace App\Http\Controllers\Swagger\Category;


use App\Http\Controllers\Controller;

/**
 *
 * @OA\Post(
 *     path="/api/v1/categories",
 *     summary="Create",
 *     tags={"Category"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="body",type="string",example="Some category")
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=201,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="data",type="object",
 *                 @OA\Property(property="body",type="string", example="Some category")
 *             ),
 *         ),
 *     )
 * ),
 *
 * @OA\Get(
 *      path="/api/v1/categories",
 *      summary="List of categories",
 *      tags={"Category"},
 *
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="data",type="array", @OA\Items(
 *                  @OA\Property(property="body",type="string",example="Some category")
 *              )),
 *          ),
 *      )
 * ),
 *
 * @OA\Get(
 *       path="/api/v1/categories/{category}",
 *       summary="Show category",
 *       tags={"Category"},
 *       @OA\Parameter(
 *           description="ID category",
 *           in="path",
 *           name="category",
 *           required=true,
 *           example=1
 *       ),
 *
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *           @OA\JsonContent(
 *              @OA\Property(property="data",type="object",
 *                  @OA\Property(property="body",type="string", example="Some category")
 *              ),
 *          ),
 *       )
 * ),
 *
 * @OA\Patch(
 *        path="/api/v1/categories/{category}",
 *        summary="Edit category",
 *        tags={"Category"},
 *        @OA\Parameter(
 *            description="ID category",
 *            in="path",
 *            name="category",
 *            required=true,
 *            example=2
 *        ),
 *        @OA\RequestBody(
 *           @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="body",type="string",example="Edit some category")
 *                  )
 *               }
 *           )
 *        ),
 *
 *        @OA\Response(
 *            response=200,
 *            description="OK",
 *            @OA\JsonContent(
 *               @OA\Property(property="data",type="object",
 *                   @OA\Property(property="body",type="string", example="Some category")
 *               ),
 *           ),
 *        )
 *  ),
 *
 *
 * @OA\Delete(
 *        path="/api/v1/categories/{category}",
 *        summary="Delete category",
 *        tags={"Category"},
 *        @OA\Parameter(
 *            description="ID category",
 *            in="path",
 *            name="category",
 *            required=true,
 *            example=1
 *        ),
 *
 *        @OA\Response(
 *            response=200,
 *            description="OK",
 *            @OA\JsonContent(
 *               @OA\Property(property="status", type="integer", example=204)
 *           ),
 *        )
 *  ),
 */
class CategoryController extends Controller
{

}
