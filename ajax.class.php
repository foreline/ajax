<?php
/**
 * Класс для работы с ajax-запросами.
 *
 * $ajax = new Ajax;
 * if ( $error ) {
 *  $ajax->error('error message', 'error code');
 * }
 *
 * $ajax->output('<h1>Ajax output</h1>');
 * $ajax->output(['key' => 'value', 'key1' => 'value1']);
 *
 * @package lib
 * @subpackage ajax
 * @author dima@foreline.ru
 */

class Ajax {

    /** @var string $charset Кодировка JSON-ответа */
    public string $charset = 'utf-8';

    /** @var int $status Статус ответа */
    public int $status = 1;

    /** @var string $error Сообщение об ошибке */
    public string $error = '';

    /** @var string $errorCode Код ошибки */
    public string $errorCode = '';

    /** @var mixed Вывод */
    public $result = '';

    /**
     * Конструктор класса
     */
    public function __construct()
    {

    }

    /**
     *
     */
    public function _result(): array
    {
        return [
            'status'    => $this->status,
            'error'     => $this->error,
            'errorCode' => $this->errorCode,
            'label'     => $this->label,
            'submitText'    => $this->submitText,
            'output'    => $this->result,
        ];
    }

    /**
     * Выводит ошибку в виде JSON. Посылает HTTP заголовок.
     * @param string $errorMessage Сообщение об ошибке
     * @param string $errorCode Код ошибки
     */
    public function error(string $errorMessage, string $errorCode = '')
    {
        $this->status = 0;
        $this->error = $errorMessage;
        $this->errorCode = $errorCode;
        $this->output();
    }

    /**
     * Выводит содержимое в виде JSON. Посылает HTTP заголовок.
     * @param mixed $result
     */
    public function output($result = '')
    {
        if ( !empty($result) ) {
            $this->result = $result;
        }
        header('Content-Type: application/json; charset=' . $this->charset);
        echo json_encode($this->_result());
        exit();
    }
}
