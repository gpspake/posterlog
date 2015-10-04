<?php
namespace App\Http\Requests;

use Carbon\Carbon;
use App\Poster;

class PosterCreateRequest extends Request
{

    /**
     * The id (if any) of the Post row
     *
     * @var integer
     */
    protected $poster;

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        $this->poster = new Poster();
    }

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
            'dimension_height' => 'required',
            'dimension_width' => 'required',
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

        if ($this->slug == '') {
            $this->poster->setTitleAttribute($this->title,'');
            $this->slug = $this->poster->slug;
        }

        $published_at = new Carbon(
            $this->publish_date.' '.$this->publish_time
        );

        return [
            'title' => $this->title,
            'dimension_height' => intval($this->dimension_height),
            'dimension_width' => intval($this->dimension_width),
            'image' => $this->image,
            'slug' => $this->slug,
            'notes' => $this->notes,
            'is_draft' => (bool)$this->is_draft,
            'published_at' => $published_at,
        ];
    }
}
