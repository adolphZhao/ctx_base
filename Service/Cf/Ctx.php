<?php

namespace Ctx\Service\Cf;

use Ctx\Basic\Ctx;
use Tree6bee\Cf\Foundation\Application;
use Tree6bee\Cf\Http\Request;

/**
 * 应用框架入口
 *
 * @copyright sh7ning 2016.1
 * @author    sh7ning
 * @version   0.0.1
 */
class CfCtx extends Ctx
{
    /**
     * 应用目录
     */
    private $appDir;

    /**
     * 应用
     *
     * @var \Tree6bee\Cf\Foundation\Application $app
     */
    private $app;

    /**
     * @param $dir
     * @return $this
     */
    public function setAppPath($dir)
    {
        $this->appDir = $dir;
        return $this;
    }

    /**
     * 运行入口
     */
    public function run()
    {
        $this->initApp();

        $kernel = $this->getKernel();

        $request = Request::capture();
        //var_dump( $request->uri->get() );

        $response = $kernel->handle($request);

        //@todo 定义 Response 类 $response->send();  //sendHeaders sendContent
        echo $response;

        //$kernel->terminate($request, $response);
    }

    /**
     * 获取Kernel实例
     *
     * @return \Tree6bee\Cf\Foundation\Kernel
     */
    private function getKernel()
    {
        $namespace = $this->app->config('namespace');
        $kernelClass = '\\' . $namespace . '\Foundation\Kernel';
        return new $kernelClass($this->app);
    }

    /**
     * 初始化框架运行环境
     */
    private function initApp()
    {
        $app = Application::getInstance($this->appDir);

        //构造config对象
        /* @var $config Config */
        $config = $this->loadC('Config', $this->appDir . '/config');

        //构造异常接管对象
        $namespace = $config->get('namespace');

        //如果采用composer统一处理 这里可以去掉
        new \Tree6bee\Ctx\Loader\Psr4(array(
            $namespace . '\\' => $this->appDir,
        ));
        $exceptionHandlerClass = '\\' . $namespace . '\Exceptions\Handler';
        $exceptionHandler = new $exceptionHandlerClass('', 'CtxFramework/1.1');

        //初始化app
        $app->init($config, $exceptionHandler);

        $this->app = $app;
    }
}
