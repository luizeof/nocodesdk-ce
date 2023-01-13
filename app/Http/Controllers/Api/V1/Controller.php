<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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
        return response()->jsonApi(
            request: $request,
            data: $json,
            endpoint: static::ENDPOINT,
            module: static::ROUTE,
        );
    }

    public function imageResponse($request, $stream, $type): Response
    {
        if (Str::contains($type, ['jpg', 'jpeg'])) {
            return $this->streamJpegResponse(
                request: $request,
                stream: $stream,
            );
        }

        if (Str::contains($type, ['png'])) {
            return $this->streamPngResponse(
                request: $request,
                stream: $stream,
            );
        }

        if (Str::contains($type, ['webp'])) {
            return $this->streamWebpResponse(
                request: $request,
                stream: $stream,
            );
        }

        if (Str::contains($type, ['svg'])) {
            return $this->streamSvgResponse(
                request: $request,
                stream: $stream,
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
            endpoint: static::ENDPOINT,
            module: static::ROUTE,
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
            endpoint: static::ENDPOINT,
            module: static::ROUTE,
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
            endpoint: static::ENDPOINT,
            module: static::ROUTE,
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
            endpoint: static::ENDPOINT,
            module: static::ROUTE,
        );
    }
}
