import React, { useState } from 'react';
import Panel from '@/Components/Panel';
import { useForm } from '@inertiajs/react';
import Input from '@/Components/Input';
import Swal from 'sweetalert2';

const ContactDetails = (props) =>{

    const { data, setData, post,  processing, errors, clearErrors, reset } = useForm({
        mobile_no_1:props.info.mobile_no_1,
        mobile_no_2:props.info.mobile_no_2,
        email_1:props.info.email_1,
        email_2:props.info.email_2,
        web:props.info.web,
        address:props.info.address,
    })

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const submitForm = (e) =>{
        e.preventDefault();
        post(route('update-contact-details'),{
            onSuccess: () =>{ 
                Swal.fire({ heightAuto: false, title: "Saved Sucessfully !", icon: "success"});
            }
        })
    }

    return (
        <Panel title="Contact Details" md="fw" className="">
            <form className='p-4' onSubmit={submitForm}>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">Mobile Number 1</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                        <Input type="text" name='mobile_no_1' value={data.mobile_no_1} placeholder="Enter Mobile Number 1" className={errors.mobile_no_1 && 'inerror'} handleChange={onHandleChange} />
                        {errors.mobile_no_1 &&  <div className="smart-valid">{errors.mobile_no_1}</div> }
                    </div>
                </div>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">Mobile Number 2</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                        <Input type="text" name='mobile_no_2' value={data.mobile_no_2} placeholder="Enter Mobile Number 2" className={errors.mobile_no_2 && 'inerror'} handleChange={onHandleChange} />
                        {errors.mobile_no_2 &&  <div className="smart-valid">{errors.mobile_no_2}</div> }
                    </div>
                </div>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">Email Address 1</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                        <Input type="text" name='email_1' value={data.email_1} placeholder="Enter Email Address 1" className={errors.email_1 && 'inerror'} handleChange={onHandleChange} />
                        {errors.email_1 &&  <div className="smart-valid">{errors.email_1}</div> }
                    </div>
                </div>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">Email Address 2</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                        <Input type="text" name='email_2' value={data.email_2} placeholder="Enter Email Address 2" className={errors.email_2 && 'inerror'} handleChange={onHandleChange} />
                        {errors.email_2 &&  <div className="smart-valid">{errors.email_2}</div> }
                    </div>
                </div>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">Web Address</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                        <Input type="text" name='web' value={data.web} placeholder="ex: https://smarteyeapps.com"  className={errors.web && 'inerror'} handleChange={onHandleChange}/>
                        {errors.web &&  <div className="smart-valid">{errors.web}</div> }
                    </div>
                </div>
                <div className="form-group row">
                    <div className="col-sm-4">
                        <label htmlFor="">Address</label>
                        <span className="form-indicat">:</span>
                    </div>
                    <div className="col-md-8">
                        <textarea type="text" name='address' value={data.address}  className={`form-control ${errors.address && 'inerror'}`} onChange={onHandleChange} placeholder="Enter Full Address"> </textarea>
                        {errors.address &&  <div className="smart-valid">{errors.address}</div> }
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
export default ContactDetails