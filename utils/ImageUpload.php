<?php
/* ImageUpload function
Copyright Tijs Vervoort
 */
namespace App\utils;

// import the Intervention Image Manager Class
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
//use Illuminate\Contracts\Validation\Validator;
use Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

// configure with favored image driver (gd by default)
//Image::configure(array('driver' => 'imagick'));

class ImageUpload
{
    private $file;
    private $name;
    private $filepath;
    private $fullpath;
/**
 * @param $file
 * Upload if everything is ok
 */
    function upload(UploadedFile $file = null, $directory)
    {

        //get file
        $this->file = $file;

        //validate
       $this->validation($file);
        //get file name
        $this->name= $file->getClientOriginalName();
        //get filepath
        $this->filepath= $directory;
        //change name if allready exists
        $this->checkUniqueName();
        //move file to directory
        $file->move($this->filepath, $this->name);
        $this->fullpath = $this->filepath . $this->name;
        return $this;
    }

    /**
     * @param $file
     * resize images if too big
     */
    function resize($width)
    {
        $img = Image::make($this->fullpath);

        $img->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $img->save($this->fullpath);
        return $this;
    }

    /**
     * @param $file
     * Validate file types
     */
    function validation($file)
    {
        $validator = Validator::make(['image' => $file], [
           'image' => 'image'

        ]);

        if ($validator->fails()) {
            throw new InvalidException('Image validation failed: file is not an image.');
        }

        return $this;
    }

    public function getFilename()
    {
        return $this->name;
    }

    public function checkUniqueName()
    {
        $Path = $this->filepath.'/'.$this->name;

        if (file_exists($Path)) {
            // Split filename into parts
            $pathInfo = pathinfo($Path);
            $extension = isset($pathInfo['extension']) ? ('.' . $pathInfo['extension']) : '';

            // Look for a number before the extension; add one if there isn't already
            if (preg_match('/(.*?)(\d+)$/', $pathInfo['filename'], $match)) {
                // Have a number; increment it
                $base = $match[1];
                $number = intVal($match[2]);
            } else {
                // No number; add one
                $base = $pathInfo['filename'];
                $number = 0;
            }

            // Choose a name with an incremented number until a file with that name
            // doesn't exist
            do {
                $Path = $pathInfo['dirname'] . DIRECTORY_SEPARATOR . $base . ++$number . $extension;
            } while (file_exists($Path));

            $array= explode('/',$Path);
            $naam=end($array);

            $this->name = $naam;
        }

            return $this->name;
    }


}