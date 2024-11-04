import React, { useEffect } from 'react';
import User from '@/Layouts/User';
import UserMenu from '@/Layouts/UserMenu';
import Path from './Shared/Path';
import Input from '@/Components/Input';
import { useForm, Link } from '@inertiajs/react';
import Swal from 'sweetalert2';


const Profile = (props) =>{

    const { data, setData, post, put, processing, errors, clearErrors, reset } = useForm({
       name : props.profile.name,
       email : props.profile.email,
       mobile : props.profile.mobile || '',
       city : props.profile.city || '',
       address : props.profile.address || '',
    })

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    }

    const saveProfile = (e) =>{
        e.preventDefault();
        post(route('update-profile'),{
            onSuccess: () =>{
                Swal.fire('Saved Sucessfully !', '', 'success')
            }
        })
    }


    return (
        <User>
           <Path title="User Profile" />
                <div className="container-fluid user-container">
                        <div className="container">
                            <div className="row">
                                <div className="col-md-3">
                                    <UserMenu user={props.auth.user} />
                                </div>
                                
                                <div className="col-md-9">
                                    <div className="row">
                                        <div className="col-md-9 mx-auto">
                                            <div className="card shadow mb-5">
                                                <div className="card-header p-3">
                                                  <h4 className='fs-6 mb-0'> User Profile</h4> 
                                                </div>
                                                <div className="card-body ">
                                                    <div className="profile-pic row">
                                                        <div className="col-md-3">
                                                            <img className='rounded shadow-sm' src={props.profile.resize} alt="" />
                                                        </div>
                                                        <div className="col-md-8  align-items-center d-flex">
                                                            <Link href={route('user-profile-image')}>
                                                                <button className="btn btn-primary">Change Profile Picture</button>
                                                            </Link>
                                                            
                                                        </div>
                                                    </div>
                                                    <div className="other-details mt-4">
                                                        <form onSubmit={saveProfile}>
                                                            <div className="form-row row">
                                                                <div className="col-md-6">
                                                                    <label className='mb-1 pt-0' >Full Name</label>
                                                                    <Input className={errors.name && 'inerror'} value={data.name} handleChange={onHandleChange} name="name"  placeholder="Enter Full Name" />
                                                                    {errors.name &&  <div className="smart-valid">{errors.name}</div> }
                                                                </div>
                                                                <div className="col-md-6">
                                                                    <label className='mb-1 pt-0' >Email Address</label>
                                                                    <input disabled className='form-control' value={data.email}  placeholder="Enter Email Address" />
                                                                </div>
                                                            </div>
                                                            <div className="form-row row">
                                                                <div className="col-md-6">
                                                                    <label className='mb-1 pt-0' >Mobile Number</label>
                                                                    <Input className={errors.mobile && 'inerror'} handleChange={onHandleChange} value={data.mobile} name="mobile"  placeholder="Enter Mobile Number" />
                                                                    {errors.mobile &&  <div className="smart-valid">{errors.mobile}</div> }
                                                                </div>
                                                                <div className="col-md-6">
                                                                    <label className='mb-1 pt-0' >Enter City</label>
                                                                    <Input placeholder="Enter City" name="city" handleChange={onHandleChange} value={data.city}  />
                                                                </div>
                                                            </div>
                                                            <div className="form-row mb-0 row">
                                                                <div className="col-md-6">
                                                                    <label className='mb-1 pt-0' >Full Address</label>
                                                                    <textarea onChange={onHandleChange} placeholder='Enter Full Address' value={data.address} name="address" id="address" cols="30" rows="3" className="form-control"></textarea>
                                                                </div>
                                                                <div className="col-md-6">
                                                                
                                                                </div>
                                                            </div>
                                                            <div className="form-row mb-0 row">
                                                                <div className="col-md-6">
                                                                
                                                                </div>
                                                                <div className="col-md-6 text-end">
                                                                <button className="btn btn-primary">Update Profile</button>
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
                </div>
        </User>
        
    )
}
export default Profile