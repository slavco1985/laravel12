import React, { useEffect } from 'react';
import User from '@/Layouts/User';
import Input from '@/Components/Input';
import Checkbox from '@/Components/Checkbox';
import { Head, Link, useForm } from '@inertiajs/react';
import Button from '@/Components/Button';

const Registration = ({ status, canResetPassword }) =>{

    const { data, setData, post, processing, errors, reset, clearErrors} = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
        clearErrors(event.target.name);
    };

    const submit = (e) => {
        e.preventDefault();
        post(route('register'));
    };


    return (
         <User>
            <div className="authbg">
                <div className="container auth-container">
                    <div className="row">
                        <div className="col-xl-6 col-lg-7 col-md-10 mx-auto shadow authcard">
                            <div className="titlecover">
                                <h2>User Registration</h2>
                            </div>
                        <form onSubmit={submit}>
                        <div className="row form-row">
                                <div className="col-md-4">
                                    <label > Full Name</label>
                                    <span className="spcol">:</span>
                                </div>
                                <div className="col-md-8">
                                    <Input
                                        type="text"
                                        name="name"
                                        value={data.name}
                                        className={errors.name && 'inerror'}
                                        autoComplete="name"
                                        placeholder="Enter Full Name"
                                        isFocused={true}
                                        handleChange={onHandleChange}
                                        
                                    />
                                    {errors.name &&  <div className="smart-valid">{errors.name}</div> }
                                </div>
                            </div>
                            <div className="row form-row">
                                <div className="col-md-4">
                                    <label > Email Address</label>
                                    <span className="spcol">:</span>
                                </div>
                                <div className="col-md-8">
                                    <Input
                                            type="email"
                                            name="email"
                                            value={data.email}
                                            className={errors.email && 'inerror'}
                                            autoComplete="username"
                                            placeholder="Enter Email Address"
                                            handleChange={onHandleChange}
                                    />
                                      {errors.email &&  <div className="smart-valid">{errors.email}</div> }      
                                </div>
                            </div>
                            <div className="row form-row">
                                <div className="col-md-4">
                                    <label >Password</label>
                                    <span className="spcol">:</span>
                                </div>
                                <div className="col-md-8">
                                    <Input
                                        type="password"
                                        name="password"
                                        value={data.password}
                                        className={errors.password && 'inerror'}
                                        autoComplete="new-password"
                                        placeholder="Enter Password"
                                        handleChange={onHandleChange}
                                        
                                    />
                                    {errors.password &&  <div className="smart-valid">{errors.password}</div> }
                                </div>
                            </div>

                            <div className="row form-row">
                                <div className="col-md-4">
                                    <label >Confirm Password</label>
                                    <span className="spcol">:</span>
                                </div>
                                <div className="col-md-8">
                                    <Input
                                        type="password"
                                        name="password_confirmation"
                                        value={data.password_confirmation}
                                        className={errors.password_confirmation && 'inerror'}
                                        placeholder="Enter Confirm Password"
                                        handleChange={onHandleChange}
                                        
                                    />
                                    {errors.password_confirmation &&  <div className="smart-valid">{errors.password_confirmation}</div> }
                                </div>
                            </div>
                        
                            

                            <div className="row form-row">
                                <div className="col-md-4">
                                
                                </div>
                                <div className="col-md-8 fpswd">
                                    <button disabled={processing} className="btn px-4 btn-primary"> Sign Up </button>
                                    <a href={route('password.request') }>Forget Password ?</a>
                                </div>
                            </div>

                            <div className="row mt-5 text-center form-row">
                            <p>Already have an account <Link className="text-primary" href={ route('login') }><b>Click to Login</b> </Link></p>
                            </div>
                        </form> 
                    </div>
                </div>
                </div>
            </div>
        </User>
    )
}
export default Registration