<?php
$conn    = get_connection();
$db      = new src\Database($conn);
if(request()->isMethod('POST'))
{
    $request = request()->post();

    $participant    = $db->insert('categories',[
        'name'      => $request->name,
    ]);

    if($participant)
        return redirect()->route('admin/kategori')->withMessage('success','Data Berhasil Disimpan!');
    return redirect()->route('admin/kategori')->withMessage('fail','Data Gagal Disimpan!');
}

return view('admin/kategori/create');