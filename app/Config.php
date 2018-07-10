<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Validation\Rule;

class Config extends Model
{
    protected $table = "config";
    public $timestamps = false;

    public function updateHomepageConfig($array) {
        $errors = [];

        $rules = [
            'home_name'   => 'required',
            'home_phone'   => 'required',
            'home_email'   => 'required|email',
            'home_address'   => 'required',
            //'home_logo' => 'max:6000|dimensions:min_width=100,min_height=100',
        ];
        $validator = Validator::make($array, $rules);

        //dd($validator->errors()->messages());
        if(!$validator->fails()) {
            $this->setValue('home_name', $array['home_name']);
            $this->setValue('home_phone', $array['home_phone']);
            $this->setValue('home_email', $array['home_email']);
            $this->setValue('home_address', $array['home_address']);
            $this->setValue('home_social_fb', $array['home_social_fb']);
            $this->setValue('home_social_instagram', $array['home_social_instagram']);
            $this->setValue('home_social_twitter', $array['home_social_twitter']);
        }
        else {
            $validateErrorsArray = $validator->errors()->messages();
            // Push all errors to an array
            foreach ($validateErrorsArray as $validateErrors) {
                foreach ($validateErrors as $error) {
                    $errors[] = $error;
                }
            }
        }
        return $errors;
    }

    /**
     * Set and save updated config value
     *
     * @param $configName
     * @param $newValue
     */
    public function setValue($configName, $newValue) {
        $config = $this->where('name', $configName)->first();
        $config->value = $newValue;
        $config->save();
    }

    public function getValue($configName) {
        return $this->where('name', $configName)->first()->value;
    }
}
