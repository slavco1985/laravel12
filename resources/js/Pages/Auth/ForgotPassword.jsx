import Guest from '@/Layouts/Guest';
import InputError from '@/Components/InputError';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, useForm } from '@inertiajs/react';

export default function ForgotPassword({ status }) {

    const { data, setData, post, processing, errors } = useForm({
        email: '',
    });

    const submit = (e) => {
        e.preventDefault();

        post(route('password.email'));
    };

    return (
        <Guest>
            <Head title="Forgot Password" />

            <div className="container-fluid big-padding my-5">
            <Head title={"Forget Password"} />
                <div className="container-lg py-5">
                    <div className="row">
                        <div className="col-xl-4 shadow-md rounded login-col bg-white shadow-sm p-5 col-lg-7 col-md-9 mx-auto">
                            
                            <div className="mb-4 text-sm text-gray-600">
                                Forgot your password? No problem. Just let us know your email address and we will email you a password
                                reset link that will allow you to choose a new one.
                            </div>

                            {status && <div className="mb-4 font-medium text-sm text-success">{status}</div>}

                            <form onSubmit={submit}>
                                <TextInput
                                    id="email"
                                    type="email"
                                    name="email"
                                    value={data.email}
                                    className="mt-1 form-control"
                                    isFocused={true}
                                    placeholder="Enter Email Address"
                                    onChange={(e) => setData('email', e.target.value)}
                                />

                                <InputError message={errors.email} className="mt-2" />
                                
                                <button  className="btn btn-primary text-light float-end mt-4" disabled={processing}>
                                    Email Password Reset Link
                                </button>
                                
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </Guest>
    );
}
