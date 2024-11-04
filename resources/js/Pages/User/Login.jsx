import React, { useEffect } from 'react';
import User from '@/Layouts/User';
import Input from '@/Components/Input';
import Checkbox from '@/Components/Checkbox';
import { Head, Link, useForm } from '@inertiajs/react';

const Login = ({ status, canResetPassword }) =>{

    const { data, setData, post, processing, errors, reset, clearErrors } = useForm({
        email: '',
        password: '',
        remember: '',
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
        post(route('login'),{
            preserveState:true,
            onSuccess: () =>{
               window.location.href=route('user-dashboard');
            },
           
        });
    };


    return (
         <User>
            <div className="authbg">
                <div className="container auth-container">
                    <form onSubmit={submit}>
                       
                        <div className="row">
                            <div className="col-lg-6 col-md-10 mx-auto shadow authcard">
                                <div className="titlecover">
                                    <h2>User Login</h2>
                                </div>
                                

                                <div className="row form-row">
                                    <div className="col-md-4">
                                        <label htmlFor="">Email Address</label>
                                        <span className="spcol">:</span>
                                    </div>
                                    <div className="col-md-8">
                                        <Input
                                            type="text"
                                            name="email"
                                            value={data.email}
                                            className={errors.email && 'inerror'}
                                            autoComplete="username"
                                            placeholder="Enter Email Address"
                                            isFocused={true}
                                            handleChange={onHandleChange}
                                        />
                                         {errors.email &&  <div className="smart-valid">{errors.email}</div> }
                                    </div>
                                </div>
                                <div className="row form-row">
                                    <div className="col-md-4">
                                        <label htmlFor="">Enter Password</label>
                                        <span className="spcol">:</span>
                                    </div>
                                    <div className="col-md-8">
                                            <Input
                                                type="password"
                                                name="password"
                                                value={data.password}
                                                className={errors.password && 'inerror'}
                                                autoComplete="current-password"
                                                placeholder="Enter Password"
                                                handleChange={onHandleChange}
                                            />
                                             {errors.password &&  <div className="smart-valid">{errors.password}</div> }
                                    </div>
                                </div>
                                <div className="row form-row">
                                    <div className="col-md-4">
                                        
                                    </div>
                                    <div className="col-md-8 mb-4">
                                        <p className=" obju">
                                        <span className="align-left">
                                        <Checkbox name="remember" value={data.remember} handleChange={onHandleChange} /> Keep me
                                            Login
                                        </span>
                                        
                                    </p>
                                    </div>
                                </div>
                                <div className="row form-row">
                                    <div className="col-md-4">
                                    
                                    </div>
                                    <div className="col-md-8 fpswd">
                                        <button disabled={processing} className="btn px-4 btn-primary"> Login </button>
                                        <span className="align-right">
                                            {canResetPassword && (
                                                <Link
                                                    href={route('password.request')}
                                                    className="underline text-sm text-gray-600 hover:text-gray-900">
                                                    Forgot your password?
                                                </Link>
                                            )}
                                        </span>
                                    </div>
                                </div>
                                <div className="row mt-4 text-center form-row">
                                <p>Don’t have an account <Link className="text-primary" href={route('registration')}><b>Click to Sign Up</b> </Link></p>
                                </div>
                            </div>
                        </div>
                    </form> `
                </div>
            </div>
        </User>
    )
}
export default Login