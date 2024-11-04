import React, { useState } from 'react';
import Panel from '@/Components/Panel';
import { useForm } from '@inertiajs/react';
import Input from '@/Components/Input';
import Swal from 'sweetalert2';

const SocialLinks = (props) =>{

    const { data, setData, post,  processing, errors, clearErrors, reset } = useForm({
        fb:props.info.fb,
        tw:props.info.tw,
        li:props.info.li,
        ins:props.info.ins,
        yt:props.info.yt,
        pin:props.info.pin,
    })

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const submitForm = (e) =>{
        e.preventDefault();
        post(route('update-social-links'),{
            onSuccess: () =>{
                Swal.fire({ heightAuto: false, title: "Saved Sucessfully !", icon: "success"});
            }
        })
    }

    return (
        <Panel title="Social Links" md="fw" className="">
            <form className='p-4' onSubmit={submitForm}>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">Facebook</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                        <Input type="text" name='fb' value={data.fb} placeholder="Enter Facebook link" className={errors.fb && 'inerror'} handleChange={onHandleChange} />
                        {errors.fb &&  <div className="smart-valid">{errors.fb}</div> }
                    </div>
                </div>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">Twitter</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                        <Input type="text" name='tw' value={data.tw} placeholder="Enter Twitter Link" className={errors.tw && 'inerror'} handleChange={onHandleChange} />
                        {errors.tw &&  <div className="smart-valid">{errors.tw}</div> }
                    </div>
                </div>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">LinkedIn</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                        <Input type="text" name='li' value={data.li} placeholder="Enter Linkedin Link" className={errors.li && 'inerror'} handleChange={onHandleChange} />
                        {errors.li &&  <div className="smart-valid">{errors.li}</div> }
                    </div>
                </div>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">Instagram</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                        <Input type="text" name='ins' value={data.ins} placeholder="Enter Instagram Link" className={errors.ins && 'inerror'} handleChange={onHandleChange} />
                        {errors.ins &&  <div className="smart-valid">{errors.ins}</div> }
                    </div>
                </div>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">Youtube</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                        <Input type="text" name='yt' value={data.yt} placeholder="Enter Youtube Link"  className={errors.yt && 'inerror'} handleChange={onHandleChange}/>
                        {errors.yt &&  <div className="smart-valid">{errors.yt}</div> }
                    </div>
                </div>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">Pintrest</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                     <Input type="text" name='pin' value={data.pin} placeholder="Enter Pinterest Link"  className={errors.pin && 'inerror'} handleChange={onHandleChange}/>
                        {errors.pin &&  <div className="smart-valid">{errors.pin}</div> }
                    </div>
                </div>
               
                <div className="form-group row">
                    <div className="col-md-4">
                        </div>
                    <div className="col-md-8 text-end">
                        <button disabled={processing} className="btn  btn-sm btn-primary">Update Contact Details</button>
                    </div>
                </div>
            </form>         
        </Panel>
    )
}
export default SocialLinks