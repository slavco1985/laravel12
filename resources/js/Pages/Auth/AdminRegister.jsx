import React, { useEffect } from 'react';
import Button from '@/Components/Button';
import Guest from '@/Layouts/Guest';
import Input from '@/Components/Input';
import ValidationErrors from '@/Components/ValidationErrors';
import { Head, Link, useForm } from '@inertiajs/react';

export default function AdminRegister() {
    const { data, setData, post, processing, errors, reset } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        return () => {
            reset('password', 'password_confirmation');
        };
    }, []);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();
        post(route('register_admin'));
    };

    return (
        <Guest>
            <div className="col-xl-4 col-lg-5 col-md-6 col-sm-10 login-cover">
                <div className="login-box">
                    <div className="logo-cover d-flex align-items-center">
                        <strong> Admin login</strong>
                    </div>
                    <div className="row">
                       
                        <ValidationErrors errors={errors} />
                        <form onSubmit={submit}>
                            <div className="form-group">
                                <div className="position-relative has-icon-right">
                                    <Input
                                        type="text"
                                        name="name"
                                        value={data.name}
                                        className="mt-1 block w-full"
                                        autoComplete="name"
                                        placeholder="Enter Full Name"
                                        isFocused={true}
                                        handleChange={onHandleChange}
                                        required
                                    />
                                </div>
                            </div>
                            <div className="form-group">
                                <div className="position-relative has-icon-right">
                                    <Input
                                        type="email"
                                        name="email"
                                        value={data.email}
                                        className="mt-1 block w-full"
                                        autoComplete="username"
                                        placeholder="Enter Email Address"
                                        handleChange={onHandleChange}
                                        required
                                    />
                                </div>
                            </div>
                            <div className="form-group">
                                <div className="position-relative has-icon-right">
                                    <Input
                                        type="password"
                                        name="password"
                                        value={data.password}
                                        className="mt-1 block w-full"
                                        autoComplete="new-password"
                                        placeholder="Enter Password"
                                        handleChange={onHandleChange}
                                        required
                                    />
                                </div>
                            </div>
                            <div className="form-group">
                                <div className="position-relative has-icon-right">
                                    <Input
                                        type="password"
                                        name="password_confirmation"
                                        value={data.password_confirmation}
                                        className="mt-1 block w-full"
                                        placeholder="Enter Confirm Password"
                                        handleChange={onHandleChange}
                                        required
                                    />
                                </div>
                            </div>
                            
                            <div className="form-group align-right">
                                <Button className="btn-primary w-100" processing={processing}>
                                    Register
                                </Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </Guest>
    );
}
