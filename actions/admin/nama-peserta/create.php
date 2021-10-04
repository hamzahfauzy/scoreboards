<?php
$conn    = get_connection();
$db      = new src\Database($conn);
if(request()->isMethod('POST'))
{
    $request = request()->post();

    $exist = $db->single('participant_names',[
        'name' => $request->name,
    ]);

    if($exist)
        return redirect()->route('admin/nama-peserta/create')->withMessage('fail','Nama Sudah Dipakai!');

    $participant    = $db->insert('participant_names',[
        'name'      => $request->name,
    ]);

    if($participant)
        return redirect()->route('admin/nama-peserta')->withMessage('success','Data Berhasil Disimpan!');
    return redirect()->route('admin/nama-peserta')->withMessage('fail','Data Gagal Disimpan!');
}

return view('admin/nama-peserta/create');