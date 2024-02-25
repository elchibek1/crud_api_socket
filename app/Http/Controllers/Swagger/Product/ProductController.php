<?php

namespace App\Http\Controllers\Swagger\Product;

use App\Http\Controllers\Controller;


/**
 *
 * @OA\Post(
 *     path="/api/v1/products",
 *     summary="Create",
 *     tags={"Product"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name",type="string",example="Some product"),
 *                     @OA\Property(property="price",type="integer",example=100),
 *                     @OA\Property(property="category_id",type="integer",example=1)
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
 *                 @OA\Property(property="name",type="string", example="Some product"),
 *                 @OA\Property(property="price",type="integer",example=100),
 *                 @OA\Property(property="category",type="string",example="some category")
 *             ),
 *         ),
 *     )
 * ),
 *
 * @OA\Get(
 *      path="/api/v1/products",
 *      summary="List of products",
 *      tags={"Product"},
 *
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="data",type="array", @OA\Items(
 *                  @OA\Property(property="name",type="string",example="Some product"),
 *                  @OA\Property(property="price",type="integer",example=100),
 *                  @OA\Property(property="category",type="string",example="some category")
 *              )),
 *          ),
 *      )
 * ),
 *
 * @OA\Get(
 *       path="/api/v1/products/{product}",
 *       summary="Show product",
 *       tags={"Product"},
 *       @OA\Parameter(
 *           description="ID product",
 *           in="path",
 *           name="product",
 *           required=true,
 *           example=1
 *       ),
 *
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *           @OA\JsonContent(
 *              @OA\Property(property="data",type="object",
 *                  @OA\Property(property="name",type="string", example="Some product"),
 *                  @OA\Property(property="price",type="integer",example=100),
 *                  @OA\Property(property="category",type="string",example="some category")
 *              ),
 *          ),
 *       )
 * ),
 *
 * @OA\Patch(
 *        path="/api/v1/products/{product}",
 *        summary="Edit product",
 *        tags={"Product"},
 *        @OA\Parameter(
 *            description="ID product",
 *            in="path",
 *            name="product",
 *            required=true,
 *            example=2
 *        ),
 *        @OA\RequestBody(
 *           @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="name",type="string",example="Edit some product"),
 *                      @OA\Property(property="price",type="integer",example=100),
 *                      @OA\Property(property="category_id",type="integer",example=1)
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
 *                   @OA\Property(property="name",type="string", example="Edit some product"),
 *                   @OA\Property(property="price",type="integer",example=100),
 *                   @OA\Property(property="category",type="string",example="some category")
 *               ),
 *           ),
 *        )
 *  ),
 *
 *
 * @OA\Delete(
 *        path="/api/v1/products/{product}",
 *        summary="Delete product",
 *        tags={"Product"},
 *        @OA\Parameter(
 *            description="ID product",
 *            in="path",
 *            name="product",
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
class ProductController extends Controller
{

}
