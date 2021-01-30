<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use App\Configuration;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use File;
use Illuminate\Http\Request;
use Storage;

class ConfigurationController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function getConfiguration()
    {
        $categories = Category::pluck('name', 'name')->toArray();


        $selectedCategories_1 = getConfiguration('products_section_1');
        $selectedCategories_2 = getConfiguration('products_section_2');
        $selectedCategories_3 = getConfiguration('products_section_3');
        $selectedCategories_4 = getConfiguration('products_section_4');


        return view('backend.settings.index')->with([
            'categories' => $categories,
            'selectedCategories_1' => json_decode($selectedCategories_1),
            'selectedCategories_2' => json_decode($selectedCategories_2),
            'selectedCategories_3' => json_decode($selectedCategories_3),
            'selectedCategories_4' => json_decode($selectedCategories_4),
        ]);
    }

    public function postConfiguration(Request $request)
    {
        $inputs = $request->all();

        foreach ($inputs as $inputKey => $inputValue) {
            if ($inputKey == 'site_logo' || $inputKey == 'site_favicon'
                || $inputKey == 'home_about_image'
                || $inputKey == 'footer_logo'
                || $inputKey == 'ceo_image'
                || $inputKey == 'catelogue') {
                $file = $inputValue;
                // Delete old file
                $this->deleteFile($inputKey);
                // Upload file & get store file name
                $fileName = $this->uploadFile($file);
                $inputValue = 'settings/' . $fileName;
            }

            if ($inputKey == 'products_section_1' || $inputKey == 'products_section_2' || $inputKey == 'products_section_3' || $inputKey == 'products_section_4'
                || $inputKey == 'trending2') {
                $inputValue = json_encode($inputValue);
            }

            Configuration::updateOrCreate(['configuration_key' => $inputKey], ['configuration_value' => $inputValue]);
        }

        // Update tax
        $enableTax = !array_key_exists("enable_tax", $inputs) ? 0 : 1;
        Configuration::updateOrCreate(['configuration_key' => 'enable_tax'], ['configuration_value' => $enableTax]);

        return redirect()->back()->with('success', 'Settings successfully updated!!');
    }

    protected function uploadFile($file)
    {
        // Store file
        $path = Storage::put('public/settings', $file, 'public');
        // Get stored file name
        $fileName = explode('public/settings/', $path);

        // File name
        return $fileName[1];
    }

    protected function deleteFile($inputKey)
    {
        $configuration = Configuration::where('configuration_key', '=', $inputKey)->first();
        // Check if configuration exists
        if (null !== $configuration && $configuration->exists()) {
            $fullPath = storage_path('app/public') . '/' . $configuration->configuration_value;
            if (File::exists($fullPath)) {
                // File exists
                File::delete($fullPath);
            }
        }
    }
}
