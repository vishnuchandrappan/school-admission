import { Divider, Form, Button } from "antd";
import React, { useContext } from "react";
import { Declaration } from "../Declaration";
import { SchoolName } from "../form-elements/SchoolName";
import { FormHeader } from "../FormHeader";
import { DeclarationContext } from "../services/DeclarationService";

const { Item } = Form;

export const CommunityForm = () => {
    const { accepted, place } = useContext(DeclarationContext);

    return (
        <>
            <FormHeader />
            <h2 className="form--heading">Community Quota</h2>
            <Divider />
            <Form
                name="community_form"
                className="login-form"
                initialValues={{
                    remember: true,
                }}
                onFinish={onFinish}
                labelCol={{ span: 24 }}
                wrapperCol={{ span: 24 }}
            >
                <SchoolName />

                <Divider />

                <Declaration />

                <Item>
                    <Button
                        type="primary"
                        htmlType="submit"
                        className="login-form-button"
                        disabled={!accepted}
                    >
                        Submit Form
                    </Button>
                </Item>
            </Form>
        </>
    );
};
