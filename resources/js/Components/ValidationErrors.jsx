import React from 'react';

export default function ValidationErrors({ errors }) {
    return (
        Object.keys(errors).length > 0 && (
            <div className="alert alert-danger" role="alert">       
                <div className="font-weight-bold text-red-600">
                <b>Whoops! Something went wrong.</b> 
                </div>

                <ul className="mt-2 list-disc list-inside text-sm text-red-600">
                     {Object.keys(errors).map(function (key, index) {
                        return <li key={index}>{errors[key]}</li>;
                    })}
                </ul>
            </div>
        )
    );
}
