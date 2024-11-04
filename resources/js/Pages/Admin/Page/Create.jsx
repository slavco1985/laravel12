import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import Input from '@/Components/Input';
import { useForm } from '@inertiajs/react';
import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';


const Create = (props) =>{

    const { data, setData, post, put, processing, errors, clearErrors, reset } = useForm({
        title:  props.page.title || '',
        description: props.page.description || '',
        content: props.page.content || '',
    })
   
   
    const [editor, setEditor] = useState();
    const [triger, setTriger] = useState(0);
    const [content, setContent] = useState(props.page.content);

    useEffect(() => {
        var editor = new EditorJS({
            minHeight: 200,
            placeholder:"Enter Your Text",
            onChange: changeHandler,
            tools: {
                header: {
                    class: Header,
                    inlineToolbar : true
                },
               
             },
             data : props.page.content,
        })
        setEditor(editor)
    }, []);

    useEffect(() => {
        setData('content', content);
    }, [content]);

    const changeHandler = (ed) =>{
       ed.saver.save().then((outputData) => {
        setContent(outputData);
       });
    }

    const onHandleChange = (event) => {
       
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const submitHandeler = (e) =>{
       e.preventDefault();
       if(props.page.id == undefined){
            post(route('pages.store')); 
       }else{
            put(route('pages.update', props.page.id)); 
       }
      
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Add Page" path="Page" pathurl="" />
            <Panel title="Add Page" md="10">
                <form className='p-4' onSubmit={submitHandeler}>
                    <div className="form-group row">  
                        <div className="col-md-2">
                            <label>Page Title</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-md-5 pr-0">
                            <Input type="text" value={data.title}  className={errors.title && 'inerror'} name="title"
                                placeholder="Enter Blog Title" handleChange={onHandleChange}/>
                                {errors.title &&  <div className="smart-valid">{errors.title}</div> }
                        </div>
                    </div>
                    <div className="form-group row">  
                        <div className="col-md-2">
                            <label>Page Description</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-md-5 pr-0">
                            <textarea name="description" placeholder='Enter Page Description' rows="3" value={data.description} onChange={onHandleChange} className={`form-control ${errors.description && 'inerror'}`}></textarea>
                            {errors.description &&  <div className="smart-valid">{errors.description}</div> }
                        </div>
                    </div>
                    <div className="roe form-row">
                        <label className='mb-3' >Add Page Content</label>
                        <div id="editorjs"></div>
                    </div>

                    <div className="form-group row">  
                        <div className="col-md-2">
                           
                        </div>
                        <div className="col-md-5 pr-0">
                            <button className="btn btn-primary">Save Page</button>
                        </div>
                    </div>
                </form>
            </Panel>
            </Authenticated>
    )
}
export default Create