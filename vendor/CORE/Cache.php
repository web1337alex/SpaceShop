<?php

namespace CORE;

class Cache
{
    use TSingleton;

    public function set($key, $data, $time = 3600): bool
    {
        $content['data'] = $data;
        $content['endTime'] = time() + $time;
        if(file_put_contents(CACHE . '/' . md5($key) . '.txt', serialize($content))){
            return true;
        } else {
            return false;
        }
    }

    public function get($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            $content = unserialize(file_get_contents($file));
            if(time() <= $content['endTime']){
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }

    public function delete($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            unlink($file);
        }
    }

}