<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Paginate extends Component
{
    /**
     * Create a new component instance.
     */
    public $data;
    public $key;

    public function __construct($data, $key)
    {

        // dd($data);
        $this->data=$data;
        $this->key=$key;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        $data = $this->data->toArray();
        $key = $this->key;


        return view('components.paginate', compact('data', 'key'));
    }

    private function nomor($data){

        // dd($data);
            $lastPage = $data['last_page'];
            $noPage = $data['current_page'];
            // var path = app.paginate.path;

            $nomor = [];
            $i = 0;
            if($noPage < 5){
                for($i = 1; $i <= 5; $i++){
                    if($i<=$lastPage){
                        array_push($nomor, $i);
                    }
                }
            }else{
                $from = $noPage-2;
                $to = $noPage+2;
                for($i = $from; $i <= $to; $i++){
                    if($i<=$lastPage){
                        array_push($nomor, $i);
                    }
                }
            };

            return $nomor;
    }
}
