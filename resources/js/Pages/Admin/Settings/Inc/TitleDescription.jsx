
import React, { useState } from 'react';
import { useForm } from '@inertiajs/react';
import Panel from '@/Components/Panel';
import Input from '@/Components/Input';
import Swal from 'sweetalert2';

const TitleDescription = (props) =>{

    const { data, setData, post,  processing, errors, clearErrors, reset } = useForm({
        title:props.info.title,
        meta:props.info.meta,
        description:props.info.description,
    })

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const submitForm = (e) =>{
        e.preventDefault();
        post(route('update-about'),{
            preserveScroll: true,
            onSuccess: () =>{
                Swal.fire({ heightAuto: false, title: "Saved Sucessfully !", icon: "success"});
            },
        })
    }


    return (
        <Panel title="Title Description" md="fw" className="">
            <form className='p-4' onSubmit={submitForm}>
                <div className="form-row row">
                    <div className="col-md-12">
                        <Input type="text" name='title' value={data.title} placeholder="Enter Site Title" className={errors.title && 'inerror'} handleChange={onHandleChange} />
                        {errors.title &&  <div className="smart-valid">{errors.title}</div> }
                    </div>
                </div>
                <div className="form-row row">
                    <div className="col-md-12">
                        <textarea type="text" value={data.meta} placeholder='Enter Key Woord' name='meta' rows={5} className={`form-control ${errors.meta && 'inerror'}`} onChange={onHandleChange}></textarea>
                        {errors.meta &&  <div className="smart-valid">{errors.meta}</div> }
                    </div>
                </div>
                <div className="form-row row">
                    <div className="col-md-12">
                        <textarea type="text" value={data.description} placeholder='Enter Description' name='description' rows={5} className={`form-control ${errors.description && 'inerror'}`} onChange={onHandleChange}></textarea>
                        {errors.description &&  <div className="smart-valid">{errors.description}</div> }
                    </div>
                </div>
                <div className="form-row row">
                    <div className="col-md-3">
                        <button disabled={processing} className="btn w-100 btn-sm btn-primary">Update About</button>
                    </div>
                </div>
            </form>         
        </Panel>
    )
}
export default TitleDescription