import React, { useState } from 'react';
import { useForm } from '@inertiajs/react'
import Panel from '@/Components/Panel';
import Input from '@/Components/Input';

const WebsiteLogo = (logo) =>{
    const { data, setData, post, errors, clearErrors, progress, processing } = useForm({
        name: null,
        avatar: null,
      })
      
      function addLogo(e) {
        e.preventDefault()
        post('/upload-site-logo')
      }

      const onHandleChange = (e) =>{
        setData('logo', e.target.files[0]);
        clearErrors(e.target.name);
      }

    return (
        <Panel title="Website Logo" md="fw" className="">
            <form className='p-4' onSubmit={addLogo}>
                {progress && (
                    <progress value={progress.percentage} max="100">
                        {progress.percentage}%
                    </progress>
                )}
                <div className="row logo-panel mb-3">
                    <img src={logo.logo} alt="" />
                </div>
                <div className="form-row row">
                    <div className="col-md-9">
                        <Input type="file" name='logo' className={errors.logo && 'inerror'} handleChange={onHandleChange} />
                        {errors.logo &&  <div className="smart-valid">{errors.logo}</div> }
                    </div>
                    <div className="col-md-3">
                        <button disabled={processing} className="btn w-100 btn-sm btn-primary">Update Logo</button>
                    </div>
                </div>
            </form>         
        </Panel>
    )
}
export default WebsiteLogo