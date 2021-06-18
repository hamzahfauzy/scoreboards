<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$participant    = $db->single('categories',[
    'id' => $_GET['id']
]);
if(request()->isMethod('POST'))
{
    $request = request()->post();
    $participant    = $db->update('categories',[
        'name'      => $request->name,
    ],[
        'id' => $_GET['id']
    ]);

    if($participant)
        return redirect()->route('admin/kategori')->withMessage('success','Data Berhasil Diupdate!');
    return redirect()->route('admin/kategori')->withMessage('fail','Data Gagal Diupdate!');
}

return view('admin/kategori/edit',[
    'participant' => $participant
]);