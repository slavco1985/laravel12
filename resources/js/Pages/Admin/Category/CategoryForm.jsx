import React, { useEffect, useState } from 'react';
import { Link, useForm } from '@inertiajs/react';
import Swal from 'sweetalert2'
import Input from '@/Components/Input';


const CategoryForm = ({typ, edit, mymodel}) =>{

    const { data, setData, post, put, processing, errors, clearErrors, reset } = useForm({
        name:  '',
        icon: '',
        description: '',
    })

    useEffect(()=>{
        if(edit != ''){
            setData({'name' : edit.name, 'description':edit.description, _method: 'PUT'});
        }
    },[edit])

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const fileHandler = (event) =>{
        setData('icon', event.target.files[0]);
        clearErrors(event.target.name);
    }

    const submitHandler = (e) =>{
        e.preventDefault();
        if(typ == 'add'){
            post(route('category.store'),{
                onSuccess: () =>{
                    reset();
                    Swal.fire('Saved Successfully!','','success');
                },
                preserveState: (page) => Object.keys(page.props.errors).length,
            })
        }else{
           
            post(route('category.update', edit.id),{
                onSuccess: () =>{
                    mymodel.hide();
                    reset();
                    Swal.fire('Saved Successfully!','','success');
                },
                preserveScroll: true,
                preserveState: (page) => Object.keys(page.props.errors).length,
               
            })
        }
        
    }

    return (
        <form className='p-4' onSubmit={submitHandler}>
            <div className="form-group  row">
                <div className="col-sm-4">
                    <label htmlFor="">Category Name</label>
                    <span className="form-indicat">:</span>
                </div>
                <div className="col-sm-8 sticky">
                    <Input type="text" value={data.name}  className={errors.name && 'inerror'} name="name"
                        placeholder="Enter Category Name" handleChange={onHandleChange}/>
                    {errors.name &&  <div className="smart-valid">{errors.name}</div> }
                </div>
            </div>
            <div className="form-group  row">
                <div className="col-sm-4">
                    <label htmlFor="">Category Icon</label>
                    <span className="form-indicat">:</span>
                </div>
                <div className="col-sm-8 sticky">
                    <Input type="file"  className={errors.icon && 'inerror'} name="icon" 
                    handleChange={fileHandler}/>
                    {errors.icon &&  <div className="smart-valid">{errors.icon}</div> }
                </div>
            </div>
            <div className="form-group  row">
                <div className="col-sm-4">
                    <label htmlFor="">Description</label>
                    <span className="form-indicat">:</span>
                </div>
                <div className="col-sm-8 sticky">
                    <textarea value={data.description}  className={`form-control ${errors.description && 'inerror'}`} name="description" 
                        placeholder="Enter Category Description" onChange={onHandleChange}></textarea>
                    {errors.description &&  <div className="smart-valid">{errors.description}</div> }
                </div>
            </div>
            <div className="form-group  row">
                <div className="col-sm-4">
                  
                </div>
                <div className="col-sm-8 sticky">
                {typ == 'edit' ?
                     <button disabled={processing} className="btn btn-primary">Update Category</button>
                     :
                     <button disabled={processing} className="btn btn-primary">Add Category</button>
                }
                    
                </div>
            </div>
        </form>
    )
}
export default CategoryForm