import React, { useEffect } from 'react';
import User from '@/Layouts/User';
import UserMenu from '@/Layouts/UserMenu';
import Path from './Shared/Path';
import { useForm } from '@inertiajs/react';
import Input from '@/Components/Input';
import Swal from 'sweetalert2';

const UserSettings = (props) =>{

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
                Swal.fire('Password Change Sucessfully !','','success');
            }
        })
    }



    return (
        <User>
           <Path title="User Settings" />
                <div className="container-fluid user-container">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-3">
                                    <UserMenu user={props.auth.user} />
                                </div>
                                
                                <div className="col-md-9">
                                    <div className="row">
                                        <div className="col-md-8 mx-auto">
                                        <div className="card side-card">
                                                <div className="card-header">
                                                    Change User Password
                                                </div>
                                                <div className="card-body">
                                                    <form className='p-4' onSubmit={changePassword} id="catform" >
                                                        <div className="form-row  row">
                                                            <div className="col-sm-4">
                                                                <label htmlFor="">Old Password</label>
                                                                <span className="spcol">:</span>
                                                            </div>
                                                            <div className="col-sm-8 sticky">
                                                                <Input type="password"  className={errors.oldpassword && 'inerror'} name="oldpassword" value={data.oldpassword}
                                                                    placeholder="Enter Old Password" handleChange={onHandleChange}/>
                                                                {errors.oldpassword &&  <div className="smart-valid">{errors.oldpassword}</div> }
                                                            </div>
                                                        </div>
                                                        <div className="form-row  row">
                                                            <div className="col-sm-4">
                                                                <label htmlFor="">New Password</label>
                                                                <span className="spcol">:</span>
                                                            </div>
                                                            <div className="col-sm-8 sticky">
                                                                <Input type="password"  className={errors.password && 'inerror'} name="password" value={data.password}
                                                                    placeholder="Enter New Password" handleChange={onHandleChange}/>
                                                                {errors.password &&  <div className="smart-valid">{errors.password}</div> }
                                                            </div>
                                                        </div>
                                                        <div className="form-row  row">
                                                            <div className="col-sm-4">
                                                                <label htmlFor="">Confirm Password</label>
                                                                <span className="spcol">:</span>
                                                            </div>
                                                            <div className="col-sm-8 sticky">
                                                                <Input type="password"  className={errors.password_confirmation && 'inerror'} name="password_confirmation" value={data.password_confirmation}
                                                                    placeholder="Enter Confirm Password" handleChange={onHandleChange}/>
                                                                {errors.password_confirmation &&  <div className="smart-valid">{errors.password_confirmation}</div> }
                                                            </div>
                                                        </div>
                                                        <div className="form-row row mb-0">
                                                            <div className="col-sm-4">
                                                                
                                                            </div>
                                                            <div className="col-sm-8 text-end">
                                                                <button disabled={processing}  className="btn  btn-primary">Change Password</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
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
export default UserSettings