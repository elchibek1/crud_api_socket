<?php

namespace App\Http\Controllers\Swagger\Passport;

use App\Http\Controllers\Controller;

/**
 *
 * @OA\Post(
 *     path="/api/v1/passports",
 *     summary="Create",
 *     tags={"Passport"},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="passportNumber",type="string",example="ABC321"),
 *                     @OA\Property(property="user_id",type="id",example="1"),
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
 *                 @OA\Property(property="passportNumber",type="string",example="ABC321"),
 *                 @OA\Property(property="user",type="string",example="user"),
 *             ),
 *         ),
 *     )
 * ),
 *
 * @OA\Get(
 *      path="/api/v1/passports",
 *      summary="List of passports",
 *      tags={"Passport"},
 *
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *              @OA\Property(property="data",type="array", @OA\Items(
 *                  @OA\Property(property="passportNumber",type="string",example="ABC321"),
 *                  @OA\Property(property="user",type="string",example="user"),
 *              )),
 *          ),
 *      )
 * ),
 *
 * @OA\Get(
 *       path="/api/v1/passports/{passport}",
 *       summary="Show passport",
 *       tags={"Passport"},
 *       @OA\Parameter(
 *           description="ID passport",
 *           in="path",
 *           name="passport",
 *           required=true,
 *           example=1
 *       ),
 *
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *           @OA\JsonContent(
 *              @OA\Property(property="data",type="object",
 *                  @OA\Property(property="passportNumber",type="string",example="ABC321"),
 *                  @OA\Property(property="user",type="string",example="user"),
 *              ),
 *          ),
 *       )
 * ),
 *
 * @OA\Patch(
 *        path="/api/v1/passports/{passport}",
 *        summary="Edit passport",
 *        tags={"Passport"},
 *        @OA\Parameter(
 *            description="ID passport",
 *            in="path",
 *            name="passport",
 *            required=true,
 *            example=2
 *        ),
 *        @OA\RequestBody(
 *           @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="passportNumber",type="string",example="ABC123"),
 *                      @OA\Property(property="user_id",type="id",example="1"),
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
 *                   @OA\Property(property="passportNumber",type="string",example="ABC123"),
 *                   @OA\Property(property="user",type="string",example="user"),
 *               ),
 *           ),
 *        )
 *  ),
 *
 *
 * @OA\Delete(
 *        path="/api/v1/passports/{passport}",
 *        summary="Delete passport",
 *        tags={"Passport"},
 *        @OA\Parameter(
 *            description="ID passport",
 *            in="path",
 *            name="passport",
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
class PassportController extends Controller
{

}
