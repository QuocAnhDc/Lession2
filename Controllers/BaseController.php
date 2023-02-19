<?php

class BaseController
{
    const VIEW_PATH ='Views';
    const MODEL_PATH ='Models';

    /*
    truy van toi view .php
     */
    protected function view($viewPath, array $data = []) {
        // Bien key cua mang thanh bien de truyen ra view
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        $viewPath = self::VIEW_PATH
            . '/'
            . str_replace('.', '/', $viewPath)
            .'.php';
        return require ($viewPath);
    }
    /*
    truy van toi controller
     */
    protected function loadModel($modelPath){
        $modelPath = self::MODEL_PATH
        . '/'
        . $modelPath
        .'.php';
        return require ($modelPath);
    }
}