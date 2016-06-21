<?php
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 16-6-21
 * Time: 上午11:18
 */

namespace App\SearchyExtend;


use YuanChao\Editor\EndaEditor;
use TomLingham\Searchy\SearchDrivers\BaseSearchDriver;

class HighlightSearchDriver extends BaseSearchDriver
{
    /**
     * @var array
     */
    protected $matchers = [
        \TomLingham\Searchy\Matchers\ExactMatcher::class                 => 100,
        \TomLingham\Searchy\Matchers\StartOfStringMatcher::class         => 50,
        \TomLingham\Searchy\Matchers\AcronymMatcher::class               => 42,
        \TomLingham\Searchy\Matchers\ConsecutiveCharactersMatcher::class => 40,
        \TomLingham\Searchy\Matchers\StartOfWordsMatcher::class          => 35,
        \TomLingham\Searchy\Matchers\StudlyCaseMatcher::class            => 32,
        \TomLingham\Searchy\Matchers\InStringMatcher::class              => 30,
        \TomLingham\Searchy\Matchers\TimesInStringMatcher::class         => 8,
    ];

    /**
     * 覆写方法
     */
    public function get()
    {
        $result = parent::get();
        foreach ($result as $k=>$v){
            //解析markdown并且去掉html元素
            $content = strip_tags($this->markUp($v->content));
            $tmp = $this->highlightWord($content);
            if(!$tmp){
                $content = mb_substr(str_replace("\n",'',$content),0,200);
            }else{
                $content = $tmp;
            }

            $result[$k]->content = $content;
            foreach ($result[$k] as $key=>$value){
                $result[$k]->$key = str_ireplace($this->searchString,'<b style="color:red;">'.$this->searchString.'</b>',$value);
            }
        }

        return $result;
    }

    /**
     * 解析
     * @param $data
     * @return string
     */
    protected function markUp($data)
    {
        return EndaEditor::MarkDecode($data);
    }

    /**
     * 高亮处理
     * @param $content
     * @return array
     */
    protected function highlightWord($content)
    {
        $result = '';
        //按段落拆分成数组处理
        $content = array_filter(explode("\n",$content));
        do{
            $tmp = $this->getMostMatch($content);
            if(!$tmp){
                break;
            }
            $result .= $tmp;
        } while (strlen($result) < 200);

        return $result;
    }

    /**
     * 获取匹配最多的一段
     * @param $content
     * @return string
     */
    protected function getMostMatch(&$content)
    {
        $maxMatchTimes = 0;
        $result = false;
        $key = null;
        foreach ($content as $k=>$v) {
            if(($matchTimes = preg_match_all('/'.$this->searchString.'/i',$v)) > $maxMatchTimes){
                $result = $v;
                $maxMatchTimes = $matchTimes;
                $key = $k;
            }
        }

        if($key){
            unset($content[$key]);
        }

        return $result;
    }
}