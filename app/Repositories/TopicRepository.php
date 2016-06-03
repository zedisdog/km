<?php
/**
 * Created by PhpStorm.
 * User: zed
 * Date: 16-5-22
 * Time: 上午10:50
 */

namespace App\Repositories;


use App\Model\Topic;
use Overtrue\Pinyin\Pinyin;

class TopicRepository extends Repository
{
    private $pinyin;

    public function __construct(Topic $model,Pinyin $pinyin)
    {
        $this->model = $model;
        $this->pinyin = $pinyin;
    }

    /**
     * get the abbr for $string
     * @param $string
     * @return string
     */
    public function ab($string)
    {
        return $this->pinyin->abbr($string);
    }

    public function create(array $data)
    {
        $data['ab'] = $this->ab($data['title']);
        return parent::create($data);
    }
    
    public function update(array $data, $id)
    {
        $data['ab'] = $this->ab($data['title']);
        return parent::update($data,$id);
    }
}