import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import BlogMenu from './Share/BlogMenu';
import EditorJS from '@editorjs/editorjs';
import { router } from '@inertiajs/react';
import Swal from 'sweetalert2';
import ImageTool from '@editorjs/image';
import Header from '@editorjs/header';

const Detail = (props) =>{
    const [bid, setBid] = useState(props.bid);
    const [detail, setDetail] = useState(props.detail);
    const [editor, setEditor] = useState();
  
    
    useEffect(() => {
        var editor = new EditorJS({
            minHeight: 250,
            placeholder:"Enter Your Text",
            tools: {
                header: {
                    class: Header,
                    inlineToolbar : true
                },
                image: {
                    class: ImageTool,
                    config: {
                        additionalRequestHeaders: {
                            "X-CSRF-TOKEN": props.csrf_token
                        },
                        endpoints: {
                            byFile: '/image-upload/', // Your backend file uploader endpoint
                        }
                    }
                }
             },
             data : detail,
        })
        setEditor(editor)
    }, []);


    
    const saveText = () =>{
        editor.save().then((outputData) => {
            router.post(route('update-blog-detail'), {'data':outputData,'bid':bid},{
                onSuccess:()=>{
                    Swal.fire('Saved!','Blog Detail Saved Sucessfully','success',);
                }
            })
        }).catch((error) => {
            console.log('Saving failed: ', error)
        });
          
    }


    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Add Blog Detail" path="Blog" pathurl="" />
            <Panel title="Add Detail Description" md="10">
                    <div className="card-header p-0">
                           <BlogMenu active="detail" bid={props.bid} />
                    </div>
                    <div className="card-body tab-content p-4">
                        <div className="form-container ">
                            <div className="row form-row">
                                    <div id="editorjs"></div>
                            </div>
                            <div className="row form">
                                <div className="col-md-12 text-end mb-4 pr-0">
                                    <button onClick={saveText} className="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </Panel>
        </Authenticated>
    )
}
export default Detail