<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApiLog;
use App\Apilog\DBLogger;
use App\Http\Resources\ApiLogCollection;

class ApiLogController extends Controller
{
     /**
     * @OA\Get(
     *   path="/api/logs",
     *   tags={"Logs"},
     *   security={ {"sanctum": {} }},
     *   summary="Show detailed logs.",
     *   operationId="showLogs",
     *  @OA\Response(
     *         response="200",
     *         description="ok",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *             )
     *         }
     *     ),
     *   @OA\Response(response="401",description="Unauthorized"),
     * )
     */
    public function list()
    {
        return new ApiLogCollection(ApiLog::latest()->paginate()); 
    }

    /**
     * @OA\Delete(
     *   path="/api/logs/refresh",
     *   tags={"Logs"},
     *   security={ {"sanctum": {} }},
     *   summary="Clean logs table.",
     *   operationId="cleanLogs",
     *  @OA\Response(
     *         response="200",
     *         description="Logs deleted successfully",
     *     ),
     *   @OA\Response(response="401",description="Unauthorized"),
     * )
     */
    public function refresh(DBLogger $logger)
    {
        $logger->deleteLogs();

        return $this->sendResponse("", 'Logs deleted successfully.');;
        
    }
}
