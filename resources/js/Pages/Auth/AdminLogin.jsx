import React, { useEffect } from 'react';
import Button from '@/Components/Button';
import Checkbox from '@/Components/Checkbox';
import Guest from '@/Layouts/Guest';
import Input from '@/Components/Input';
import ValidationErrors from '@/Components/ValidationErrors';
import { Head, Link, useForm } from '@inertiajs/react';

export default function AdminLogin({ status, canResetPassword }) {
    const { data, setData, post, processing, errors, reset } = useForm({
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
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('login-admin'));
    };


    return (
        <Guest>
            <div className="col-xl-4 col-lg-5 col-md-6 col-sm-10 login-cover">
                <div className="login-box">
                    <div className="logo-cover d-flex align-items-center">
                        <strong> Admin login</strong>
                    </div>
                    <div className="row">
                        {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}
                        <ValidationErrors errors={errors} />
                        <form onSubmit={submit}>
                            <div className="form-group">
                                <div className="position-relative has-icon-right">
                                <Input
                                    type="text"
                                    name="email"
                                    value={data.email}
                                    className="mt-1 block w-full"
                                    autoComplete="username"
                                    placeholder="Enter Email Address"
                                    isFocused={true}
                                    handleChange={onHandleChange}
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
                                        autoComplete="current-password"
                                        placeholder="Enter Password"
                                        handleChange={onHandleChange}
                                    />
                                </div>
                            </div>
                            <div className="form-group ">
                                <p className=" obju">
                                    <span className="align-left">
                                    <Checkbox name="remember" value={data.remember} handleChange={onHandleChange} /> Keep me
                                        Login
                                    </span>
                                    <span className="align-right">
                                        {canResetPassword && (
                                            <a
                                                href={route('password.request')}
                                                className="underline text-sm text-gray-600 hover:text-gray-900"
                                            >
                                                Forgot your password?
                                            </a>
                                        )}
                                    </span>
                                </p>
                            </div>
                            <div className="form-group align-right">
                                <Button className="btn-primary w-100" processing={processing}>
                                    Log in
                                </Button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </Guest>
    )
}
