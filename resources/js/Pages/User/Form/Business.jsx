import React, { useState,useEffect } from 'react';
import { router } from '@inertiajs/react';
import User from '@/Layouts/User';
import EditorJS from '@editorjs/editorjs';
import TabLink from './Shared/TabLink';
import Path from '../Shared/Path';
import { Link } from '@inertiajs/react';
import Header from '@editorjs/header';


const Business = (props) =>{

    const [active, setActive] = useState('business');
    const [typ, setTyp] = useState('');
    const [lid, setLid] = useState(props.lid)
    const [text, setText] = useState('');
    const [editor, setEditor] = useState();
    
    useEffect(() => {
        var editor = new EditorJS({
            minHeight: 150,
            placeholder:"Enter Your Text",
            tools: {
                header: {
                    class: Header,
                    inlineToolbar : true
                },
               
             },
             data : props.about,
        })
        setEditor(editor)
    }, []);


    
    const saveText = () =>{
        editor.save().then((outputData) => {
            router.post(route('busines-detail.store'), {'data':outputData,'lid':lid},{
                onSuccess:()=>{
                    Swal.fire('Deleted!','Service Removed Sucessfully','success',);
                }
            })
        }).catch((error) => {
            console.log('Saving failed: ', error)
        });
          
    }

    return (
        <User>
            <Path title="About Business" />
            <div className="container ">
                <div className="row new-listing">
                    <div className="col-md-10 p-0 listing-col mx-auto">
                        <div className="card shadow text-center">
                            <div className="card-header p-0">
                                 <TabLink active={active} typ={typ} lid={lid}  />
                            </div>
                            <div className="card-body tab-content p-0">
                                <div className="form-container ">
                                    <div className="row form-row">
                                         <div id="editorjs"></div>
                                    </div>
                                    <div className="row form">
                                        <div className="col-md-12 text-end mb-4 pr-0">
                                            <button onClick={saveText} className="btn btn-primary">Save and Continue</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div className="card-footer text-muted">
                                    <div className="row">
                                        <div className="col-md-6 pt-2 left">
                                            <p>Step 3 of 7</p>
                                        </div>
                                        <div className="col-md-6 right">
                                            <Link href={route('user-dashboard')}>
                                                <button className="btn  btn-light">Skip and Go to Dashboard</button> 
                                            </Link>
                                           
                                        </div>
                                    </div>
                                
                                </div>
                        </div>
                    </div>
                </div>
            </div>
         </User>
    )
}
export default Business;