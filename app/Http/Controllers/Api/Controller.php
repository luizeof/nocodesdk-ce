<?php

/**
 * HTTP API Namespace
 * php version 8
 *
 * @category Controller
 * @package  StackingWidgets
 * @author   Luiz Eduardo Oliveira Fonseca <luizeof@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     https://github.com/luizeof/stackingwidgets
 */

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Generate API Response for Endpoints
 *
 * @category Controller
 * @package  StackingWidgets
 * @author   Luiz Eduardo Oliveira Fonseca <luizeof@gmail.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://pear.php.net/package/PackageName
 */
abstract class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;

    /**
     * Register Usage Log and Repond using JSON API
     *
     * @param Request $request User Request
     * @param array   $json    Processed Data
     * @param string  $type    Image Type
     *
     * @return Response Json API Response
     */
    public function jsonResponse($request, array $json): Response
    {
        return response()->make(
            $json["data"],
            ($json["processed"]) ? Response::HTTP_OK : Response::HTTP_UNPROCESSABLE_ENTITY,
            [
                'Content-Type' => 'application/json',
                'X-Powered-By' => 'NoCodeSDK'
            ]
        );
    }

    public function imageResponse($request, $stream, $type): Response
    {
        if (Str::contains($type, ['jpg', 'jpeg'])) {
            return Response::make(
                content: $stream,
                status: 200,
                headers: [
                    'Content-Type' => 'image/jpeg',
                    'X-Powered-By' => 'NoCodeSDK'
                ]
            );
        }

        if (Str::contains($type, ['png'])) {
            return Response::make(
                content: $stream,
                status: 200,
                headers: [
                    'Content-Type' => 'image/png',
                    'X-Powered-By' => 'NoCodeSDK'
                ]
            );
        }

        if (Str::contains($type, ['webp'])) {
            return Response::make(
                content: $stream,
                status: 200,
                headers: [
                    'Content-Type' => 'image/webp',
                    'X-Powered-By' => 'NoCodeSDK'
                ]
            );
        }

        if (Str::contains($type, ['svg'])) {
            return Response::make(
                content: $stream,
                status: 200,
                headers: [
                    'Content-Type' => 'image/svg+xml',
                    'X-Powered-By' => 'NoCodeSDK'
                ]
            );
        }
    }

    /**
     * Register Usage Log and Repond using PNG
     *
     * @param Request $request User Request
     * @param mixed   $stream  Stream
     *
     * @return Response PNG Response
     */
    public function streamPngResponse($request, mixed $stream): Response
    {
        return response()->pngApi(
            request: $request,
            stream: $stream,
        );
    }

    /**
     * Register Usage Log and Repond using JPEG
     *
     * @param Request $request User Request
     * @param mixed   $stream  Stream
     *
     * @return Response JPEG Response
     */
    public function streamJpegResponse($request, mixed $stream): Response
    {
        return response()->jpegApi(
            request: $request,
            stream: $stream,
        );
    }

    /**
     * Register Usage Log and Repond using SVG
     *
     * @param Request $request User Request
     * @param mixed   $stream  Stream
     *
     * @return Response SVG Response
     */
    public function streamSvgResponse($request, mixed $stream): Response
    {
        return response()->svgApi(
            request: $request,
            stream: $stream,
        );
    }

    /**
     * Register Usage Log and Repond using WEBP
     *
     * @param Request $request User Request
     * @param mixed   $stream  Stream
     *
     * @return Response WEBP Response
     */
    public function streamWebpResponse($request, mixed $stream): Response
    {
        return response()->WebpApi(
            request: $request,
            stream: $stream,
        );
    }
}
