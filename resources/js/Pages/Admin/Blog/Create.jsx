import React, { useEffect, useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import PageTitle from '@/Components/PageTitle';
import Panel from '@/Components/Panel';
import BlogMenu from './Share/BlogMenu';
import Input from '@/Components/Input';
import { useForm } from '@inertiajs/react';


const Create = (props) =>{
  
    const [category, setCategory] = useState(props.category);
    const { data, setData, post, put, processing, errors, clearErrors, reset } = useForm({
        title:  props.blog.title || '',
        category: props.blog.category_id || '',
        image: '',
        description: props.blog.description || '',
    })

    useEffect(()=>{
        if(props.blog.id != undefined){
            setData('_method', 'PUT');
        }
    },[])

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const fileHandler = (event) =>{
        setData(event.target.name, event.target.files[0]);
        clearErrors(event.target.name);
    }

    const submitHandeler = (e) =>{
        e.preventDefault();
        if(props.blog.id != undefined){
            post(route('blog.update', props.blog.id));
        }else{
            post(route('blog.store'));
        }
        
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Add Blog" path="Blog" pathurl="" />
            <Panel title="Add Blog" md="10">
                    <div className="card-header p-0">
                            {
                                props.blog.id != undefined ?
                                    <BlogMenu active="add" bid={props.blog.id} />
                                 :
                                    <BlogMenu active="add" bid="" />
                            }
                           
                    </div>
                    <div className="card-body tab-content p-4">

                        <form onSubmit={submitHandeler}>
                            <div className="form-group row">  
                                <div className="col-md-2">
                                    <label>Blog Title</label>
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
                                    <label>Select Category</label>
                                    <span className="form-indicat">:</span>
                                </div>
                                <div className="col-md-5 pr-0">
                                    <select className={`form-control ${errors.category && 'inerror'}`} value={data.category} onChange={onHandleChange} name="category" id="">
                                        <option value=''>Select Category</option>
                                        {
                                            category  && category.map((c, i)=>{
                                                return <option  key={i} value={c.id}>{c.name}</option>
                                            })
                                        }
                                    </select>
                                    {errors.category &&  <div className="smart-valid">{errors.category}</div> }
                                </div>
                            </div>

                            <div className="form-group row">  
                                <div className="col-md-2">
                                    <label>Select Image</label>
                                    <span className="form-indicat">:</span>
                                </div>
                                <div className="col-md-5 pr-0">
                                    <input type="file" className={`form-control ${errors.image && 'inerror'}`} name="image"  onChange={fileHandler} />
                                    {errors.image &&  <div className="smart-valid">{errors.image}</div> }
                                </div>
                            </div>

                            <div className="form-group row">  
                                <div className="col-md-2">
                                    <label>Blog Description</label>
                                    <span className="form-indicat">:</span>
                                </div>
                                <div className="col-md-5">
                                    <textarea placeholder='Enter Blog Description' className={`form-control ${errors.description && 'inerror'}`} name="description" value={data.description} rows="3" onChange={onHandleChange}></textarea>
                                    {errors.description &&  <div className="smart-valid">{errors.description}</div> }
                                </div>
                            </div>

                            <div className="form-group row">  
                                <div className="col-md-2">
                                
                                </div>
                                <div className="col-md-5 pr-0">
                                {
                                    props.blog.id != undefined ?
                                        <button className="btn btn-primary">Update Blog</button>
                                    :
                                        <button className="btn btn-primary">Add Blog</button>
                                }
                                
                                </div>
                            </div>
                        </form>
                    </div>
            </Panel>
        </Authenticated>
    )
}
export default Create