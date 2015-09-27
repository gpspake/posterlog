<?php
namespace App\Http\Requests;

use Carbon\Carbon;

class PosterCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'dimensions' => 'required',
            'image' => 'required',
            'publish_date' => 'required',
            'publish_time' => 'required',
        ];
    }

    /**
     * Return the fields and values to create a new poster from
     */
    public function posterFillData()
    {
        $published_at = new Carbon(
            $this->publish_date.' '.$this->publish_time
        );
        return [
            'title' => $this->title,
            'dimensions' => $this->dimensions,
            'image' => $this->image,
            'description' => $this->description,
            'is_draft' => (bool)$this->is_draft,
            'published_at' => $published_at,
        ];
    }
}
