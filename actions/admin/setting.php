<?php

$all_fields  = get_content_json('setting');

if(request()->isMethod('POST'))
{
    $request = request()->post();
    
    $datas = json_encode($request);

    if(set_content_json('setting',$datas))
        return redirect()->route('admin/setting')->withMessage('success','Data Berhasil Disimpan!');
    return redirect()->route('admin/setting')->withMessage('fail','Data Gagal Disimpan!');
}

return view('admin/home/setting',[
    'data'=>get_content_json('setting')
]);