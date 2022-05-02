<?php

namespace Sandex\Marketing\Presentation\Api\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sandex\Marketing\Data\Services\ProductService;
use Sandex\Marketing\Data\Requests\StoreProductRequest;
use Sandex\Marketing\Presentation\Handler\ProductShowHandler;
use Sandex\Marketing\Presentation\Handler\ProductIndexHandler;
use Sandex\Marketing\Presentation\Handler\ProductStoreHandler;
use Sandex\Marketing\Presentation\Handler\ProductDeleteHandler;
use Sandex\Marketing\Data\DataSources\RemoteMysql\ProductLocalStaticDataSourceRepository;
use Sandex\Marketing\Data\DataSources\RemoteMysql\ProductRemoteMysqlDataSourceRepository;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Response(
            (
                new ProductIndexHandler(
                    new ProductService(new ProductRemoteMysqlDataSourceRepository())
                )
            )->handle($request)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        return Response(
            (
                new ProductStoreHandler(
                    new ProductService(new ProductRemoteMysqlDataSourceRepository())
                )
            )->handle($request)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return Response((array)(
            new ProductShowHandler(
                new ProductService(
                    new ProductRemoteMysqlDataSourceRepository()
                )
            )
        )->handle($request));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return Response((
            new ProductDeleteHandler(
                new ProductService(new ProductRemoteMysqlDataSourceRepository())
            )
        )->handle($request));
    }


    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function staticIndex(Request $request)
    {
        return Response(
            (
                new ProductIndexHandler(
                    new ProductService(new ProductLocalStaticDataSourceRepository())
                )
            )->handle($request)
        );
    }
}
