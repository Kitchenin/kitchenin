<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Cornford\Backup\Facades\Backup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ScriptController extends Controller
{

    public function index()
    {
        $restores = Backup::getRestorationFiles();

        foreach ($restores as &$restore) {
            preg_match('/.*\/([a-z0-9\-]*)\.sql/', $restore, $match);
            $restore = $match[1];
        }

        return view('admin.script.index', [
            'restores' => array_reverse(array_sort($restores)),
            'categories' => Category::all(),
        ]);
    }

    public function increasePrices(Request $request)
    {
        $percentage = $request->input('percentage');
        Backup::export('dbbackup-'.date('Y-m-d-H-i-s'));

        if ($request->category_id > 0) {
            DB::update('UPDATE products set price = price*(100 + ?)/100 WHERE category_id=?', [$percentage, $request->category_id]);
            DB::update('UPDATE options set price = price*(100 + ?)/100 WHERE product_id IN (SELECT id FROM products WHERE category_id=?)', [$percentage, $request->category_id]);
            DB::update('UPDATE colour_product set price = price*(100 + ?)/100 WHERE product_id IN (SELECT id FROM products WHERE category_id=?)', [$percentage, $request->category_id]);
        } else {
            DB::update('UPDATE products set price = price*(100 + ?)/100', [$percentage]);
            DB::update('UPDATE options set price = price*(100 + ?)/100', [$percentage]);
            DB::update('UPDATE colour_product set price = price*(100 + ?)/100', [$percentage]);
        }

        return back()->with(['message' => 'Prices are increased with '.$percentage.'%']);
    }

    public function decreasePrices(Request $request)
    {
        $percentage = $request->input('percentage');

        Backup::export('dbbackup-'.date('Y-m-d-H-i-s'));

        if ($request->category_id > 0) {
            DB::update('UPDATE products set price = price*(100 - ?)/100 WHERE category_id=?', [$percentage, $request->category_id]);
            DB::update('UPDATE options set price = price*(100 - ?)/100 WHERE product_id IN (SELECT id FROM products WHERE category_id=?)', [$percentage, $request->category_id]);
            DB::update('UPDATE colour_product set price = price*(100 - ?)/100 WHERE product_id IN (SELECT id FROM products WHERE category_id=?)', [$percentage, $request->category_id]);
        } else {
            DB::update('UPDATE products set price = price*(100 - ?)/100', [$percentage]);
            DB::update('UPDATE options set price = price*(100 - ?)/100', [$percentage]);
            DB::update('UPDATE colour_product set price = price*(100 - ?)/100', [$percentage]);
        }

        return back()->with(['message' => 'Prices are decreased with '.$percentage.'%']);
    }

    public function backup()
    {
        $filename = 'dbbackup-'.date('Y-m-d-H-i-s');
        Backup::export($filename);

        return back()->with(['message' => 'Database is backed up to file '.$filename]);
    }

    public function restore(Request $request)
    {
        $filename = $request->input('filename');

        Backup::restore(config('backup.path').$filename.'.sql');

        return back()->with(['message' => 'Database restored from file '.$filename]);
    }


}
