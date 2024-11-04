import React, { useState } from 'react';
import Authenticated from '@/Layouts/Authenticated';
import { useForm } from '@inertiajs/react';
import Input from '@/Components/Input';
import Panel from '@/Components/Panel';
import PageTitle from '@/Components/PageTitle';
import Swal from 'sweetalert2';

const Password = (props) =>{

    const { data, setData, post,  processing, errors, clearErrors, reset } = useForm({
        oldpassword:'',
        password:'',
        password_confirmation:''
    })
    
    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const changePassword = (e) =>{
        e.preventDefault();
        post(route('change-password'),{
            onSuccess: () =>{
                reset();
                Swal.fire('Password Change Successfully !','','success');
            }
        })
    }

    return (
        <Authenticated auth={props.auth} errors={props.errors} current = {props.current}>
            <PageTitle title="Password Settings" path="Settings" pathurl="" />
            <Panel title="Change Admin Password" md="6">
                <form className='p-4' onSubmit={changePassword} id="catform" >
                    <div className="form-group  row">
                        <div className="col-sm-4">
                            <label htmlFor="">Old Password</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-8 sticky">
                            <Input type="password"  className={errors.oldpassword && 'inerror'} name="oldpassword" value={data.oldpassword}
                                placeholder="Enter Old Password" handleChange={onHandleChange}/>
                            {errors.oldpassword &&  <div className="smart-valid">{errors.oldpassword}</div> }
                        </div>
                    </div>
                    <div className="form-group  row">
                        <div className="col-sm-4">
                            <label htmlFor="">New Password</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-8 sticky">
                            <Input type="password"  className={errors.password && 'inerror'} name="password" value={data.password}
                                placeholder="Enter New Password" handleChange={onHandleChange}/>
                            {errors.password &&  <div className="smart-valid">{errors.password}</div> }
                        </div>
                    </div>
                    <div className="form-group  row">
                        <div className="col-sm-4">
                            <label htmlFor="">Confirm Password</label>
                            <span className="form-indicat">:</span>
                        </div>
                        <div className="col-sm-8 sticky">
                            <Input type="password"  className={errors.password_confirmation && 'inerror'} name="password_confirmation" value={data.password_confirmation}
                                placeholder="Enter Confirm Password" handleChange={onHandleChange}/>
                            {errors.password_confirmation &&  <div className="smart-valid">{errors.password_confirmation}</div> }
                        </div>
                    </div>
                    <div className="form-group  row">
                        <div className="col-sm-4">
                            
                        </div>
                        <div className="col-sm-8 text-end">
                            <button disabled={processing}  className="btn  btn-primary">Change Password</button>
                        </div>
                    </div>
                </form>
            </Panel>
        </Authenticated>
    )
}
export default Password


