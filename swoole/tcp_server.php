<?php
/**
 * Created by PhpStorm.
 * User: Windows
 * Date: 2016/11/10
 * Time: 10:57
 */

/**
 * Class tcp_server
 * onConnect/onClose/onReceive这3个回调函数必须设置。其他事件回调函数可选
 * 如果设定了timer定时器，onTimer事件回调函数也必须设置
 * 如果启用了task_worker，onTask/onFinish事件回调函数必须设置
 */

class tcp_server {

    private $serv;

    public function __construct()
    {
        //创建服务，并设置端口
        $this->serv = new swoole_server('0.0.0.0',9527);
        //设置服务的参数
        $this->serv->set(
            array(
                'worker_num' => 8,
                'daemonize' => false,//是否开启守护进程
                'max_request' => 10000,
                'dispatch_mode' => 2,
                'debug_mode'=> 1,
                'task_worker_num' => 8
            )
        );

        $this->serv->on('Start', array($this, 'onStart'));
        $this->serv->on('Connect', array($this, 'onConnect'));
        $this->serv->on('Receive', array($this, 'onReceive'));
        $this->serv->on('Close', array($this, 'onClose'));
        // bind callback
        $this->serv->on('Task', array($this, 'onTask'));
        $this->serv->on('Finish', array($this, 'onFinish'));


        //启动服务
        $this->serv->start();
    }
    //Server启动在主进程的主线程回调此函数
    public function onStart( $serv ) {
        echo 'server start, swoole version: ' . SWOOLE_VERSION . PHP_EOL;
    }
    //连接
    public function onConnect( $serv, $fd, $from_id ) {
        $params = func_get_args();

        echo "Client {$fd} connect\n";
    }
    //接受来自客户端的数据
    public function onReceive( swoole_server $serv, $fd, $from_id, $data ) {
        echo "Get Message From Client {$fd}:{$data}\n";
        // send a task to task worker.
        $param = array(
            'fd' => $fd
        );
        $serv->task( json_encode( $param ) );
        echo "Continue Handle Worker\n";
    }
    //关闭连接
    public function onClose( $serv, $fd, $from_id ) {
        echo "Client {$fd} close connection\n";
    }
    //执行task任务
    public function onTask($serv,$task_id,$from_id, $data) {
        echo "This Task {$task_id} from Worker {$from_id}\n";
        echo "Data: {$data}\n";
        for($i = 0 ; $i < 10 ; $i ++ ) {
            sleep(1);
            echo "Taks {$task_id} Handle {$i} times...\n";
        }
        //send to client
        $fd = json_decode( $data , true )['fd'];
        $serv->send( $fd , "Data in Task {$task_id}");
        return "Task {$task_id}'s result";
    }

    //接收task返回的数据
    public function onFinish($serv,$task_id, $data) {
        echo "Task {$task_id} finish\n";
        echo "Result: {$data}\n";
    }

}
$server = new Server();