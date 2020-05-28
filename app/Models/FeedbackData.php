<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class FeedbackData extends Model
{
    protected $fillable = [
        'name', 'email', 'message', 'phone'
    ];

    protected $rules = array(
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    );

    public function validate($inputs)
    {
        $v = Validator::make($inputs, $this->rules);
        if ($v->passes()) return true;
        $this->errors = $v->messages();
        return false;
    }
}
