<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$participant    = $db->single('participants',[
    'id' => $_GET['id']
]);
if(request()->isMethod('POST'))
{
    $request = request()->post();
    $participant    = $db->update('participants',[
        'name'      => $request->name,
        'gender'    => $request->gender,
        'order_number'    => $request->order_number,
    ],[
        'id' => $_GET['id']
    ]);

    if($participant)
        return redirect()->route('admin/peserta')->withMessage('success','Data Berhasil Diupdate!');
    return redirect()->route('admin/peserta')->withMessage('fail','Data Gagal Diupdate!');
}

return view('admin/peserta/edit',['participant' => $participant]);